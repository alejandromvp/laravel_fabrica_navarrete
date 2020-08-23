<template>
    <div class="Main">
        <div class="bienvenida">
            <p style="display:none;">
                <a href=""> Bienvenido</a>
            </p>
            <p >
                <a href=""> Sistema Stock y Ventas</a>
            </p>
            <p  style="display:none;">
                <a href="">YELLOW WALL</a>
            </p>
            <p  style="display:none;">
                <a href="">Orange County</a>
            </p>
            <p  style="display:none;">
                <a href="">VIOLET HILL</a>
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        //props se usa cuando se obtiene info(array) de forma externa
        props: [],
        data(){
            return{
                editMode:false
            };
        },
        mounted() {
            console.log('Component mounted.') 
        },
        methods: {
            
        }
    }
</script>

