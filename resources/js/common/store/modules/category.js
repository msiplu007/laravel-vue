import Axios from "axios"

export const category = {
    namespaced: true,
    state:{
      categories: [],
    },
    getters:{
        categoryList(state){
          return state.categories;
      }
    },
    actions: {
        categoryList(context, payload) {
            Axios.get('/admin/category/')
            .then(res=>{
                context.commit('categoryList', res.data.categories)
            })
        }
    },
    mutations: {
        categoryList(state, payload) {
            return state.categories = payload;
        }
    }

}
