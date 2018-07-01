<template>
    <div :class="$style.container">
        <nav :class="$style.navbar">
            <img :class="$style.logo" src="../../img/logo.png">
            <ul :class="$style.links">
                <li><a href="#">LOREM IPSUM LINK1</a></li>
                <li><a href="#">LINK 2</a></li>
                <li><a href="#">LOREM IPSUM LINK 3</a></li>
                <li><a href="#">LOREM IPSUM LINK 4</a></li>
            </ul>
        </nav>

        <section :class="$style.sectionOne">
            <img :class="$style.top" src="../../img/top.png">
            <img :class="$style.text" src="../../img/text.png">
        </section>

        <img :class="$style.carrossel" src="../../img/carrossel.png">

        <section :class="$style.sectionText">
            <div :class="$style.loremIpsum">
                <img src="../../img/lorem_ipsum.png">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing eli</p>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non pharetra dui. Fusce consectetur lacus non ligula pellentesque maximus. Sed porttitor risus lacus, eu porta metus molestie nec.</p>
        </section>

        <section :class="$style.sectionContact">
            <Contact />
            <img :class="$style.goodLuck" src="../../img/good_luck.png">
        </section>

        <footer :class="$style.footer" />  
    </div>
</template>

<script>
import Contact from './Contact.vue'

export default {
    name: 'Home',
    components: {
        Contact
    }
}
</script>

<style module>
* {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
}

.container {
    display: grid;
}

.navbar {
    width: 100%; 
    background-color: #fff;
    display: flex;
    justify-content: center;
}

.logo {
    max-width: 239px;
    width: 100%;
    max-height: 43px;
    margin: 10px 8% 10px 10px;
    display: block;
    cursor: pointer;
}

.links {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
}

.links > li {
    padding: 22px 12px;    
}

.links > li > a {
    text-decoration: none;
    color: #636466;
    font-size: 12px;
}

.links > li > a:hover {
    color: #363636;
} 

@media (max-width: 838px) {
    .navbar {
        flex-direction: column;
    }

    .logo {
        margin: 10px auto;
    }

    .links {
        justify-content: center;
    }
}

@media (max-width: 525px) {
    .links {
        flex-direction: column;
    }

    .logo {
        margin: 0 auto;
    }
    
    .links > li {
        padding: 5px;
        text-align: center;
    }
}

.sectionOne {
    position: relative;
}

.top {
    width: 100%;
    display: block;
}

.text {  
    position: absolute;
    top: 0;
    left: 0;
    margin-left: 21%;
    margin-top: 8%;
    width: 31%;
    display: block;
}

.carrossel {
    width: 100%;
    display: block;
}

.sectionText {
    background-color: #000;
    color: #fff;
    font-size: 20px;
    font-family: Avenir, Helvetica, Arial, sans-serif;
    font-weight: 300;
    text-transform: uppercase;
    text-align: center;
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 120px 0;
}

.loremIpsum {
    max-width: 330px;
    justify-self: end;
    margin: 0 39px;
}

.loremIpsum > img {
    max-width: 330px;
    width: 100%;
}

.sectionText > p {
    margin: 0;
    max-width: 300px;
    margin: 0 39px;
}

@media (max-width: 776px) {
    .sectionText {
        grid-template-columns: 1fr;
        padding: 100px 10px;
    }

    .loremIpsum,
    .sectionText > p {
        justify-self: center;
        margin: 0;
    }
}

.sectionContact {
    background: url('../../img/bottom.png');
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
    background-position: center top;
    display: grid;
    grid-template-columns: 50% 50%;
}

.goodLuck {
    grid-column: span 1;
    max-width: 290px;
    width: 100%;
    margin: auto auto auto 0;
}

@media (max-width: 700px) {
    .sectionContact {
        grid-auto-flow: dense
    }

    .goodLuck {
        grid-column: span 2;
        margin: auto;
        grid-row: 1;
        padding: 15px;
    }
}

.footer {
    width: 100%;
    height: 16px;
    background-color: #005cac;
}
</style>