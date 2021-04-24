import Axios from "axios"

export const product = {
    namespaced: true,
    state:{
      products: [],
    },
    getters:{
        productList(state){
          return state.products;
      }
    },
    actions: {
        productList(context, payload) {
            Axios.get('/admin/product/?page='+payload)
            .then(res=>{
                context.commit('productList', res.data.products)
            })
        },
        deleteProduct(context, payload){
            Axios.delete('/admin/product/'+payload)
            .then(res=>{
                context.commit('productList', res.data.products)
            })
        }
    },
    mutations: {
        productList(state, payload) {
            return state.products = payload;
        }
    }

}
