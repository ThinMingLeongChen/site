<template>
    <div :class="$style.container">
        <div :class="$style.header">
            <h5>REALIZE O TESTE DE CADASTRO</h5>
        </div>
        <form @submit.prevent="sendForm()" :class="$style.form">
            <div :class="$style.form__group">
                <input v-model="name" :class="$style.form__input" type="text" name="name" placeholder="NOME" required maxlength="255" />
            </div>
            
            <div :class="$style.form__group">
                <input v-model="email" :class="$style.form__input" type="email" name="email" placeholder="E-MAIL" required maxlength="255" />
            </div>

            <div :class="$style.form__group">
                <input v-model="phone" :class="$style.form__input" type="tel" name="phone" placeholder="TELEFONE" maxlength="15" @input="phoneMask()" />
            </div>

            <div :class="$style.form__group__half">
                <input v-model="city" :class="$style.form__input" type="text" name="city" placeholder="CIDADE" maxlength="255" />
            </div>
            
            <div :class="$style.form__group__half">
                <input v-model="state" :class="$style.form__input" type="text" name="state" placeholder="ESTADO" maxlength="255" />
            </div>

            <div :class="[$style.form__group, $style.period]">
                <p :class="$style.period__title">HORÁRIO PARA CONTATO:</p>
                <label>
                    <input v-model="period.day" type="checkbox" name="period[]" value="M" />
                    MANHÃ
                </label>

                <label>
                    <input v-model="period.evening " type="checkbox" name="period[]" value="T" />
                    TARDE
                </label>

                <label>
                    <input v-model="period.night" type="checkbox" name="period[]" value="N" />
                    NOITE
                </label>
            </div>

            <button :class="$style.btn">ENVIAR</button>

            <p :class="$style.result" v-text="result" />
        </form>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'Contact',
        data() {
            return {
                name: '',
                email: '',
                phone: '',
                city: '',
                state: '',
                period: {
                    day: '',
                    evening: '',
                    night: ''
                },
                result: ''
            }
        },
        computed: {
        },
        methods: {
            phoneMask() {
                this.phone = this.phone.replace(/\D/g, '')
                this.phone = this.phone.replace(/^(\d{2})(\d)/g, '($1) $2')
                this.phone = this.phone.replace(/(\d)(\d{4})$/, '$1-$2')
            },
            clearForm() {
                this.name = '',
                this.email = '',
                this.phone = '',
                this.city = '',
                this.state = '',
                this.period = {
                    day: '',
                    evening: '',
                    night: ''
                }
            },
            sendForm() {
                const period = []
                if (this.period.day) {
                    period.push('M')
                } 
                if (this.period.evening) {
                    period.push('T')
                } 
                if (this.period.night) {
                    period.push('N')
                } 

                axios.post('/contato', {
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    city: this.city,
                    state: this.state,
                    period: period.toString()
                })
                    .then(res => {
                        this.result = 'Envio efetuado com sucesso!!'
                        this.clearForm()
                    })
                    .catch(err => {
                        if (err.response.data.errors.email) {
                            this.result = err.response.data.errors.email[0]
                        } else if (err.response.data.errors.name) {
                            this.result = err.response.data.errors.name[0]
                        }
                    })
            }
        }
    }
</script>

<style module>
    * {
        box-sizing: border-box;
    }

    .container {
        max-width: 300px;
        background-color: #000;
        padding: 10px 25px;
        z-index: 2;
        grid-column: span 1;
        margin: auto;
    }

    @media (max-width: 700px) {
        .container {
            grid-column: span 2;
        }
    }

    .header {
        padding: 17px 0;
        border-top: 1px solid #005cac;
        border-bottom: 1px solid #005cac;
        text-align: center;
        margin: 45px 0 25px 0;
    }

    .header > h5 {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        font-weight: 300;
        font-size: 20px;
        color: #fff;
        margin: 0;
    }

    .form {
        display: grid;
        grid-template-columns: 59% 36%;
        grid-column-gap: 12px;
        grid-row-gap: 10px;
    }

    .form__input {
        padding: 10px 18px;
        border: 0;
        width: 100%;
    }

    .form__group {
        grid-column: span 2;
    }

    .form__group__half {
        grid-column: span 1;
    }

    @media (max-width: 370px) {
        .form__group__half {
            grid-column: span 2;
        }
    }

    .period {
        color: #fff;
        font-size: 12px;
        font-family: Avenir, Helvetica, Arial, sans-serif;
        font-weight: 500;
    }

    .period__title {
        margin: 2px 0 10px 0;
    }

    .period > label {
        position: relative;
        padding-left: 16px;
        margin-right: 12px;
        cursor: pointer;
    }

    .period > label > input {
        position: absolute;
        margin: 0;
        top: 1px;
        left: 0;
        cursor: pointer;
    }

    @media (max-width: 260px) {
        .period {
            display: grid;
        }

        .period > label {
            line-height: 1.5;
        }

        .period > label > input {
            top: 2px;
        }
    }

    .btn {
        color: #fff;
        background-color: #005cac;
        border: 0;
        padding: 10px;
        grid-column: span 2;
        justify-self: center;
        margin-top: 25px;
    }

    .btn:hover {
        background-color: #00427c;
    }

    .result {
        color: #fff;
        font-size: 16px;
        grid-column: span 2;
        text-align: center;
        margin: 8px 0;
    }
</style>
