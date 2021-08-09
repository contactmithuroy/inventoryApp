<template>
    <div class="card-body p-0">
        <!-- form start -->
        <form role="form" @submit.prevent="createProduct">
            <div class="row d-flex justify-content-between">
                <!-- Product Details -->
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <h4 class="mt-2 ml-2">Product Details</h4>
                        <div class="row">
                            <!-- Product details  -->
                            <div class="col-12">
                                <div class="row mt-2 ml-1 mr-2">
                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                            <label for="name"> Product Name<span class="text-danger">*</span></label>
                                            <input type="text" v-model="productForm.name" name="name" :class="{'is-invalid':productForm.errors.has('name')}" class="form-control" id="name" placeholder="Enter Product name" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                        <label for="category_id">Category</label>
                                        <select v-model="productForm.category_id" name="category_id" id="category_id" :class="{'is-invalid': productForm.errors.has('category_id')}" class="form-control" >
                                            <option value="" style="display: none" selected >Please select</option>
                                            <option v-for="category in categories" :key="category.id" :value="category.id">{{category.name}}</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                        <label for="brand_id">Brand</label>
                                        <select v-model="productForm.brand_id" name="brand_id" id="brand_id" :class="{'is-invalid': productForm.errors.has('brand_id')}" class="form-control" >
                                            <option value="" style="display: none" selected >Please select</option>
                                            <option v-for="brand in brands" :key="brand.id" :value="brand.id">{{brand.name}}</option>
                                        </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                            <label for="sku">SKU<span class="text-danger">*</span></label>
                                            <input type="text" v-model="productForm.sku" name="sku" :class="{'is-invalid':productForm.errors.has('sku')}" class="form-control" id="sku" placeholder="Enter SKU Number" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                            <label for="cost_price">Cost Price<span class="text-danger">*</span></label>
                                            <input type="number" v-model="productForm.cost_price" name="cost_price" :class="{'is-invalid':productForm.errors.has('cost_price')}" class="form-control" id="cost_price" placeholder="Enter Cost Price" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                            <label for="retail_price">Retail Price<span class="text-danger">*</span></label>
                                            <input type="number" v-model="productForm.retail_price" name="retail_price" :class="{'is-invalid':productForm.errors.has('retail_price')}" class="form-control" id="retail_price" placeholder="Enter Retail Price" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                            <label for="year" >Year(EX:2021)<span class="text-danger">*</span></label>
                                            <input type="number" v-model="productForm.year" name="year" :class="{'is-invalid':productForm.errors.has('year')}" class="form-control" id="year" placeholder="Enter Year" >
                                        
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                        <label for="Image">Image<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" @change="onImageChange" name="image" :class="{'is-invalid': productForm.errors.has('image')}" class="custom-file-input" id="Image">
                                                <label class="custom-file-label" for="Image">Choose Image</label>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                            <label for="year" >Description<span class="text-danger">*</span></label>
                                            <textarea type="text" name="description" v-model="productForm.description"  :class="{'is-invalid': productForm.errors.has('description')}" id="description" cols="30" rows="10" class="form-control" placeholder="Product Description (MAX:300)"></textarea>
                                        
                                        </div>
                                    </div>
                                    <!-- STATUS -->
                                    <div class="col-md-10 offset-md-1">
                                        <div class="form-group">
                                        <label for="category_id">status<span class="text-danger">*</span></label>
                                        <select v-model="productForm.status" name="status" id="status" :class="{'is-invalid': productForm.errors.has('status')}" class="form-control" >
                                            <option value="" style="display: none" selected >Is show your home page?</option>
                                            <option :value="1">Show</option>
                                            <option :value="0">Hide</option>
                                        </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->               
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Daynamic Product Size-->
                <div class="col-md-6">
                        <!-- size -->
                        <div class="card card-primary card-outline">
                            <h4 class="mt-2 ml-2">Product Size</h4>
                            <!-- daynamic items start -->
                            <div v-for="(item, index) in this.productForm.items" :key="index" class="row mt-2 ml-1 mr-2">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select v-model="item.size_id" class="form-control" >
                                            <option value="" style="display: none" selected >Select Size</option>
                                            <option v-for="size in sizes" :key="size.id" :value="size.id">{{size.name}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                    <input v-model="item.location" type="text" class="form-control" placeholder="Location">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input v-model="item.quantity" type="number" class="form-control" placeholder="Quantity">
                                    </div>
                                </div>
                                <!-- delete new items -->
                                <div class="col-sm-3">
                                    <button @click="deleteItem(index)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash taxt-danger"></i></button>
                                </div>
                                <!-- End size form -->
                            <!-- add new items -->
                            <button @click="addItem" type="button" class="btn btn-success btn-sm mt-2 ml-2 mb-4"><i class="fa fa-plus taxt-danger"></i>Add Item</button>
                        </div>
                    <!-- daynamic items End -->
                    </div>
                </div>
            </div>
            <div class="col-md-10 mt-3 mb-2">
                <button :disabled="productForm.busy" type="submit" id="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
    </div>
</template>



 <script>
    import Form from 'vform'
    import{objectToFormData} from 'object-to-formData'
    // import Select2Component
    // import Select2 from 'v-select2-component';
    export default {
        // declare Select2Component
        // components: {Select2},
        data(){
            return{
                productForm:new Form({
                    name:'',
                    category_id:'',
                    brand_id:'',
                    sku:'',
                    cost_price:0,
                    retail_price:0,
                    year:'',
                    description:'',
                    status:'',
                    datainfo:[],
                    items:
                        {
                            size_id:'',
                            location:'',
                            quantity:'',
                        },
                        
                   


                }),
                categories:[],
                brands:[],
                sizes:[],

            }
        },
        methods:{
            // LOAD CATEGORY 
            loadCategories(){
                axios.get('/api/categories')
                .then(response =>{
                    console.log(response.data.data)
                     this.categories = response.data.data;
                });
            },
            // LOAD BRAND
            loadbrands(){
                axios.get('/api/brands')
                .then(response =>{
                    console.log(response.data.data)
                     this.brands = response.data.data;

                });
            },

            // LOAD BRAND
            loadsizes(){
                axios.get('/api/sizes')
                .then(response =>{
                    console.log(response.data.data)
                     this.sizes = response.data.data;

                });
            },

            createProduct(){
                // let data = new FormData();
                this.productForm.post('/admin/product')
                .then(({data})=>{
                    console.log(data);
                    // this.productForm.name = '';
                    // this.productForm.category_id = '';
                    // this.productForm.brand_id = '';
                    // this.productForm.sku = '';
                    // this.productForm.cost_price = '';
                    // this.productForm.retail_price = '';
                    // this.productForm.year = '';
                    // this.productForm.description = '';
                    // this.productForm.status = 0;
                     
                }).catch(() =>{
             
                });
                console.log('form submited');
            },
            
            // set image file data on image name variable
            onImageChange(e){
                const file = e.target.files[0]
                this.productForm.image = file
            },
 
            // daynamin items create
            addItem(){
                // let item = {
                //     size_id:'',
                //     location:'',
                //     quantity:'', 
                    
                // }
            //    JSON.stringify(this.productForm.items.push(item));
               this.productForm.datainfo.push(this.items);
            },
            // daynamin items delete
            deleteItem(index){
                this.productForm.items.splice(index,1)
            },

        },
        mounted(){ 
            // GET CATEGORIES
                this.loadCategories();
            // GET BRANDS
                this.loadbrands();
            // GET SIZE
                this.loadsizes();
               
        }
    }
</script>

//  store call/dispatch actions>GET_CATEGORIES
    // ->this GET_CATEGORIES go to action-types 
    //     -> and this action-types  GET_CATEGORIES load data on modules/category/action.js 
    //         ->this action get data using axios