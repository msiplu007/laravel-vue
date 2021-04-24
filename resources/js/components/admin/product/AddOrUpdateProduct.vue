<template>
   <div class="content-wrapper">
       <div class="content">
            <div class="container-fluid">
               <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
       <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Add New Product</h3>

                  </div>

                </div>
                <!-- {{ options.options.color}} -->

                <div class="card-body">
                    <el-form @submit.prevent="SaveOrUpdateProduct" >
                    <el-form-item label="Category name">
                        <el-input v-model="form.name" placeholder="Prduct Name"></el-input>
                            <span class="text-danger" v-if="errors['name']">
                            {{errors['name'][0]}}
                        </span>
                    </el-form-item>

                      <el-form-item label="Select Category zone">
                 <el-select v-model="form.category_id" placeholder="please select Category">
                        <el-option v-for="category in categories" :key="category.id" :label="category.name" :value="category.name"></el-option>

                        </el-select>
                           <span class="text-danger" v-if="errors['category_id']">
                            {{errors['category_id'][0]}}
                        </span>
                    </el-form-item>

                                  <el-form-item label="Select Brand zone">
                          <el-select v-model="form.brand_id" placeholder="please select Brand">
                        <el-option v-for="brand in brands" :key="brand.id" :label="brand.name" :value="brand.name"></el-option>

                        </el-select>
                           <span class="text-danger" v-if="errors['brand_id']">
                            {{errors['brand_id'][0]}}
                        </span>
                    </el-form-item>

                        <el-form-item label="Product price">
                        <el-input type="number" v-model="form.price" placeholder="Prduct Name"></el-input>
                            <span class="text-danger" v-if="errors['price']">
                            {{errors['price'][0]}}
                        </span>
                    </el-form-item>


                          <el-form-item label="Discount price">
                        <el-input  v-model="form.discount_price" placeholder="Prduct discount price"></el-input>
                            <span class="text-danger" v-if="errors['discount_price']">
                            {{errors['discount_price'][0]}}
                        </span>
                    </el-form-item>


                          <el-form-item label="Description">
                        <el-input type=""  v-model="form.description" placeholder="Prduct description"></el-input>
                            <span class="text-danger" v-if="errors['description']">
                            {{errors['description'][0]}}
                        </span>
                    </el-form-item>

                      <el-form-item label="Product Size">
                            <el-checkbox-group v-model="form.size">

                            <el-checkbox v-for="size in options.options.size" :key="size.value" :label="size.value" name="size">
   {{ size.label }}
                            </el-checkbox>

                            </el-checkbox-group>
                                 <span class="text-danger" v-if="errors['size']">
                            {{errors['size'][0]}}
                        </span>
                        </el-form-item>


                     <el-form-item label="Product Color">
                            <el-checkbox-group v-model="form.color">
                          <el-checkbox v-for="size in options.options.color" :key="size.value" :label="size.value" name="size">
                              {{ size.label }}
                          </el-checkbox>

                            </el-checkbox-group>

                                 <span class="text-danger" v-if="errors['color']">
                            {{errors['color'][0]}}
                        </span>
                        </el-form-item>

                              <el-form-item label="Product Quantity">
                        <el-input  v-model="form.product_quantity" placeholder="Prduct Quantity "></el-input>
                            <span class="text-danger" v-if="errors['product_quantity']">
                            {{errors['product_quantity'][0]}}
                        </span>
                    </el-form-item>

                        <el-form-item label="Product Image">
                        <el-input type="file"  v-model="form.image" placeholder="Prduct Image "></el-input>
                            <span class="text-danger" v-if="errors['image']">
                            {{errors['image'][0]}}
                        </span>
                    </el-form-item>
                      <el-button style="float:right;" @click.prevent="SaveOrUpdateProduct" type="primary">Submit</el-button>
                </el-form>

                </div>
                </div>
                </div>
                </div>
            </div>
       </div>
   </div>
</template>

<script>
import jsonOptions from '../../../common/helper/form'
export default {
  name: 'AddOrUpdateProduct',
  data() {
      return {
          options:jsonOptions,
          errors:{},
          form:{
            size:[],
            color:[]
          }
      }
  },
  methods: {
         categoryList(){
             this.$store.dispatch('category/categoryListAll');
      },

         brandList(){
             this.$store.dispatch('brand/brandListAll');
      },
      SaveOrUpdateProduct(){
          axios.post('/admin/product', this.form)
          .then(res=>{
         console.log(res)
          })
          .catch(err=>{
              this.errors = err.response.data.errors
          })
      }
  },
  created() {
      this.categoryList();
      this.brandList();
  },
  computed:{
   categories(){
            return this.$store.getters['category/categoryList'];
        },
         brands(){
            return this.$store.getters['brand/brandList'];
        },
  }
}
</script>

<style>

</style>
