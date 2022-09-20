<template>
  <div class="row">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de productos</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-append">
                      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProductoModal" data-bs-backdrop="static" data-bs-keyboard="false" @click="limpiar()"><i class="fas fa-plus"></i> Nuevo producto</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <vue-bootstrap4-table :classes="classes" :rows="productos" :columns="columns" :config="config"  @on-change-query="onChangeQuery"  :totalRows="total_rows">
                    <template slot="sort-asc-icon">
                        <i class="fas fa-sort-up"></i>
                    </template>
                    <template slot="cat_nombre" slot-scope="props">
                      {{ props.row.categoria.cat_nombre }}
                    </template>                 
                    <template slot="action" slot-scope="props">
                      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ProductoModal" @click="edit(props.row)"> <i class="fas fa-edit" ></i></a>
                      <a href="#" v-if="!props.row.deleted_at" class="btn btn-danger" @click="deleteItem(props.row)"> <i class="fas fa-trash-alt" ></i></a>                        
                    </template>                                                     
                </vue-bootstrap4-table>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="modal fade" id="ProductoModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
              <div class="modal-content">          
                <div class="modal-header">
                  <h4 class="modal-title">{{title}}</h4>
                  <button type="button" class="close" data-bs-dismiss="modal">X</button>
                </div>
                <div class="modal-body">
                  <div class="form-group row">
                    <label for="lbname" class="col-sm-3 col-form-label text-right">Nombre producto:</label>
                    <div class="col-sm-9">
                      <validation-provider rules="required_produ_nombre" v-slot="{ errors }">
                        <input type="text" class="form-control" id="produ_nombre" name="produ_nombre" v-model="form.produ_nombre" placeholder="Nombre producto">                        
                        <p v-if="errors[0]" class="text-danger" role="alert">{{ errors[0] }}</p>
                      </validation-provider>
                    </div>     
                  </div>
                  <div class="form-group row">
                    <label for="lbdpto" class="col-sm-3 col-form-label text-right">Categoria:</label>
                    <div class="col-sm-9">
                      <validation-provider rules="required_categoria" v-slot="{ errors }">
                        <select v-model="form.cat_cod" name="" id="" class="form-control">       
                          <option :value="categoria.cat_cod" v-for='categoria in categorias'  v-bind:key="categoria.cat_cod" placeholder="categoria">
                            {{ categoria.cat_nombre }}                  
                          </option>
                        </select>
                        <p v-if="errors[0]" class="text-danger" role="alert">{{ errors[0] }}</p>
                      </validation-provider>
                    </div>  
                  </div>                         
                </div>
                <div class="modal-footer">                  
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Cancelar</button>
                  <button type="submit" class="btn btn-success" :disabled='isDisabled' @click.prevent='save()'>Guardar</button>
                </div>
              </div>
            </div>
          </div>          
        </div>
      </div>
  </div>  
</template>
<script>
import VueBootstrap4Table from 'vue-bootstrap4-table';
import { ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';
  extend('required_produ_nombre', {
    ...required,
    message: 'Este campo es obligatorio.'
  });
  extend('required_categoria', {
    ...required,
    message: 'Este campo es obligatorio.'
  }); 

  export default {
    props:['url','csrf','categorias'],
    name: "table-example",
    display: "Table",

    data:()=>({
      columns: [
        {
          label: "COD",
          name: "produ_cod",
          sort: true,
          column_classes: "td-header-table"
        },                
        {
          label: "Nombre producto",
          name: "produ_nombre",
          filter: {
              type: "simple",
              placeholder: "Nombre producto",
          },
          sort: true,
          row_text_alignment: "text-center",
          column_text_alignment: "text-center",
          row_classes: "my-row-class1 my-row-class2",
          column_classes: "td-header-table"
        },
        {
          label: "Categoria",
          name: "cat_nombre",
          filter: {
              type: "simple",
              placeholder: "Categoria",
          },
          sort: true,
          row_text_alignment: "text-center",
          column_text_alignment: "text-center",
          row_classes: "my-row-class1 my-row-class2",
          column_classes: "td-header-table"
        },
        {
          label: "Usr. Reg.",
          name: "usua_reg",
          filter: {
              type: "simple",
              placeholder: "Usr. Reg.",
          },
          sort: true,
          row_text_alignment: "text-center",
          column_text_alignment: "text-center",
          row_classes: "my-row-class1 my-row-class2",
          column_classes: "td-header-table"
        }, 
        {
          label: "Usr. Mod.",
          name: "usua_mod",
          filter: {
              type: "simple",
              placeholder: "Usr. Mod.",
          },
          sort: true,
          row_text_alignment: "text-center",
          column_text_alignment: "text-center",
          row_classes: "my-row-class1 my-row-class2",
          column_classes: "td-header-table"
        },      
        {
          label: "Acciones",
          name: "action",
          sort: false,
          column_classes: "td-header-table"
        },    
      ],
      config: {
        checkbox_rows: false,
        rows_selectable: false,
        pagination: true,
        card_mode: false,
        show_refresh_button:  false,
        show_reset_button:  false,
        global_search:  {
          placeholder:  "Enter custom Search text",
          visibility:  false,
          case_sensitive:  false
        },
        per_page_options:  [5,  10,  20,  30],
        server_mode:  true,
        loaderText: 'Updating...',
      },
      queryParams: {
        sort: [],
        filters: [],
        global_search: "",
        per_page: 10,
        page: 1,
      },
      total_rows: 0,
      showLoader: true,
      classes: {
        table : {
          "table-striped" : true,
        },
      },            
      productos:[],
      form:{
        camp_des:null,
        gestion:null,
        fecha_ini:null,
        fecha_fin:null,
        estado_cod:null
      },
      title:'',
      isDisabled: false,              
    }),

    mounted() {            
      this.search();  
    },
    methods: {     
      limpiar(){
        this.form = {};
        this.title = 'Nuevo producto'
      },

      search() {
        axios.get('productos/create', {
          params: this.getParams(this.queryParams)
        })
        .then((response)=> {                    
            this.productos= response.data.data;
            this.total_rows =response.data.total;
            this.showLoader = false;
        })
        .catch((error)=> {
            
        });
      },
      onChangeQuery(queryParams) {
        this.showLoader = true;
        this.queryParams = queryParams;
        this.search();
      },
      getParams (queryParams) {
        let params={};
        queryParams.filters.forEach(element => {
          if(element.type=='simple'){
            switch (element.name) {
              default:
                params[element.name] = element.text;
                break;
            }
          }
        });
        params['page']=queryParams.page;
        params['pagination_rows']=queryParams.per_page;
        return params;
      },

      save()
      {
        axios.post(`productos`,this.form)
        .then(response=>{                    
          $('#ProductoModal').modal('hide');
          this.search();
          if(response.data.fecha_reg){
            toastr.success('Se registro el producto '+response.data.produ_nombre); 
          }else if(response.data.fecha_mod){
            toastr.warning('Se modifico el producto '+response.data.produ_nombre);
          }                                    
        }).catch((error)=>{                        
          if(error.response.status == 422){
            this.errors = error.response.data.errors
          }
        });
      },
      edit(producto){
        console.log(producto);
        axios.get(`productos/${producto.produ_cod}`).then(response=>{
          console.log(response.data);
          this.form = response.data.producto;
          this.title = 'Editar el producto '+response.data.producto.produ_nombre;
        });
      },
      deleteItem(data){
        Swal.fire({
        title: 'Esta seguro de eliminar al producto '+data.produ_nombre+'?',
        text: "Una vez eliminado el producto no podra reestablecerlo",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
        }).then((result) => {
          if (result.value) {
            axios.delete(`productos/${data.produ_cod}`)
            .then(response=>{
                this.search();
                toastr.error('Se elimino el producto '+response.data.produ_nombre);
            })
            .catch(error=>{
                Swal.fire(
                'Error! contactese con soporte tecnico',
                ''+error,
                'error'
                )
            });
          }
        })
      },
    },
    components: {
      VueBootstrap4Table,
      ValidationProvider
    },       
  }
</script>
