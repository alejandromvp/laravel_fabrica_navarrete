<template>
    <div class="Main_Accesos">
        <div class="card">
            <div class="card-header bg-light">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab1">Administrar usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab2">Administrar grupos</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content ">
                    <div class="tab-pane active" id="tab1">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-light">Nombre</th>
                                    <th class="text-light">Rol de usuario</th>
                                    <th class="text-light">Estado</th>
                                    <th class="text-light">Ultimo ingreso</th>
                                    <th class="text-light">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alejandro Villagran</td>
                                    <td>Administrador</td>
                                    <td> <b class="estado_activo">Activo</b></td>
                                    <td>25/08/2020 4:43:20 pm</td>
                                    <td>
                                        <button class="btn btn-warning">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Camilo Silva</td>
                                    <td>Administrador</td>
                                    <td> <b class="estado_activo">Activo</b></td>
                                    <td>25/08/2020 4:43:20 pm</td>
                                    <td>
                                        <button class="btn btn-warning">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab2">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-light">Nombre del grupo</th>
                                    <th class="text-light">Nivel del grupo</th>
                                    <th class="text-light">Estado</th>
                                    <th class="text-light">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Administrador</td>
                                    <td>1</td>
                                    <td> <b class="estado_activo">Activo</b></td>
                                    <td>
                                        <button class="btn btn-warning">Editar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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