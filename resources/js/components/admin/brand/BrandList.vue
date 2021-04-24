<template>
<div class="content-wrapper mt-4">
<div class="content">
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
           <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Brand List</h3>


                   <el-button type="primary" @click="BrandCreate" round>Add New <i class="el-icon-plus"></i></el-button>

                  </div>
                   <el-button @click="multipleDelete" v-if="multipleSelection.length>0" type='danger' size="small">Multuple Delete</el-button>
                </div>

              <el-table
                    ref="multipleTable"
                    :data="brands.data"
                    style="width: 100%"
                    @selection-change="handleSelectionChange">
                    <el-table-column
                    type="selection"
                    width="55">
                    </el-table-column>
                    <el-table-column
                    label="Date"
                    width="120">
                    <template slot-scope="scope">{{ scope.row.created_at | timeFormat }}</template>
                    </el-table-column>
                    <el-table-column
                    property="name"
                    label="Name"
                    width="120">
                    </el-table-column>

                        <el-table-column label="Actions" fixed="right">
     <template slot-scope="scope">

        <el-button @click="handleClick" type="text" size="small">Detail</el-button>
        <!-- <el-button type="text" size="small">Edit</el-button> -->
          <el-button type="text" size="small" @click.prevent="editBrand(scope.row)">Edit</el-button>
        <el-button @click="deleteBrand(scope.row.id)" size="small">Delete</el-button>
      </template>
                        </el-table-column>
                </el-table>

                <el-pagination
                class="text-center"
                    background

                      @current-change="handleCurrentChange"
                    :current-page.sync="currentPage"
                    :page-size="brands.per_page"
                    layout="prev, pager, next"
                    :total="brands.total">
                    </el-pagination>
                  </div>
       </div>
       </div>
   </div>
</div>
<el-dialog

 :title ="form.id ? 'Edit Brand' : 'Add New Brand'"
  :visible.sync="BrandDialog"
  width="50%"
  center>
  <span>

       <el-form  label-width="120px" @submit="addNewBrand">
        <el-form-item label="Brand name">
            <el-input v-model="form.name" placeholder="Brand Name"></el-input>
                 <span class="text-danger" v-if="errors['name']">
                  {{errors['name'][0]}}
              </span>
        </el-form-item>

       </el-form>
  </span>
  <span slot="footer" class="dialog-footer">

    <el-button @click="BrandList">Cancel</el-button>
    <el-button type="primary" v-if="!form.id" @click="addNewBrand">Save</el-button>
        <el-button type="primary" v-else @click="updateBrand">Update</el-button>
  </span>
</el-dialog>

</div>

</template>

<script>
export default {
   name: 'BrandList',
     data() {
      return {
        currentPage: 1,
        multipleSelection: [],
        BrandDialog: false,
        errors:{},
        form:{
          name:''
        }
      }
    },

    methods: {
             multipleDelete(){
        axios.post('/admin/multiple-brand-delete', this.multipleSelection)
        .then(res=>{
            this.$message({
              message: 'Brand Deleted Successfully...',
              type: 'success'
            });
            this.BrandList();
        })
      },
      handleCurrentChange(){
             this.$store.dispatch('brand/brandList', this.currentPage)

      },
              BrandCreate() {
         this.BrandDialog = true;
         this.crearData();
      },
         editBrand(Brand) {
        this.BrandDialog = true;
        this.form = Brand
      },
      toggleSelection(rows) {
        if (rows) {
          rows.forEach(row => {
            this.$refs.multipleTable.toggleRowSelection(row);
          });
        } else {
          this.$refs.multipleTable.clearSelection();
        }
      },
      handleSelectionChange(val) {
        this.multipleSelection = val;
      },
    //   handleClick(){
    //     console.log('click');
    //   },
      BrandList(){
              this.BrandDialog = false
         this.$store.dispatch('brand/brandList', this.currentPage)
      },
         deleteBrand(id){
            this.$store.dispatch('brand/deleteBrand', id)
            this.$message({
          showClose: true,
          message: 'Brand deleted successfully......',
          type: 'success'
        });
      },
        addNewBrand(){
        axios.post('/admin/brand', this.form)
        .then(res=>{
           this.$message({
            message: 'Brand Added Successfully...',
            type: 'success'
          });
          this.crearData();
          this.BrandList();
          this.BrandDialog = false;
        })
        .catch(err=>{
          this.errors = err.response.data.errors
        })
      },

            updateBrand(){
         axios.put('/admin/brand/'+this.form.id, this.form)
        .then(res=>{
           this.$message({
            message: 'Brand Updated Successfully...',
            type: 'success'
          });
          this.crearData();
          this.BrandList();
          this.BrandDialog = false;
        })
        .catch(err=>{
          this.errors = err.response.data.errors
        })
      },
      crearData(){
        this.errors = {}
        this.form = {}
      }

    },
     created() {
        this.BrandList();
    },
    computed: {
        brands(){
            return this.$store.getters['brand/brandList'];
        }
    },
}
</script>

<style>

</style>
