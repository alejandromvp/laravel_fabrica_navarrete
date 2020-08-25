<template>
    <div class="Main">
        <div class="panel_control_gred_1">
            <div style="background-color: #A3C86D;">
                <div class="gred1_content">
                    <div class="item1_grid">
                        <span style="font-size: 48px; color: white;">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <div class="item2_grid">
                        <b>4</b>
                        <b>Usuarios</b>
                    </div>
                </div>
            </div>
            <div style="background-color: #FF7857;">
                <div class="gred1_content">
                    <div class="item1_grid">
                        <span style="font-size: 48px; color: white;">
                            <i class="fas fa-list"></i>
                        </span>
                    </div>
                    <div class="item2_grid">
                        <b>4</b>
                        <b>Categorias</b>
                    </div>
                </div>
            </div>
            <div style="background-color: #7ACBEE;">
                <div class="gred1_content">
                    <div class="item1_grid">
                        <span style="font-size: 48px; color: white;">
                            <i class="fas fa-shopping-cart"></i>
                        </span>
                    </div>
                    <div class="item2_grid">
                        <b>3</b>
                        <b>Productos</b>
                    </div>
                </div>
            </div>
            <div style="background-color: #FDD761;">
                <div class="gred1_content">
                    <div class="item1_grid">
                        <span style="font-size: 48px; color: white;">
                            <i class="fas fa-dollar-sign"></i>
                        </span>
                    </div>
                    <div class="item2_grid">
                        <b>7</b>
                        <b>Ventas</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel_control_gred_2">
            <div class="table1">
                <div class="card">
                    <div class="card-header bg-secondary">
                            <b class="text-white">PRODUCTOS MAS VENDIDOS</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Total vendido</th>
                                    <th>Cantidad total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pandereta</td>
                                    <td>2</td>
                                    <td>29</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="table1">
                <div class="card">
                    <div class="card-header bg-secondary">
                            <b class="text-white">ULTIMAS VENTAS</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Fecha</th>
                                    <th>Venta total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pandereta</td>
                                    <td>2</td>
                                    <td>29</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="table1">
                <div class="card">
                    <div class="card-header bg-secondary">
                            <b class="text-white">PRODUCTO RECIENTEMENTE AÑADIDOS</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Total vendido</th>
                                    <th>Cantidad total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pandereta</td>
                                    <td>2</td>
                                    <td>29</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- cierre panel control gred 2 -->
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

