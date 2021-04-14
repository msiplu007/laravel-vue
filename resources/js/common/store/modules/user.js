import Axios from "axios"

export const user = {
    namespaced: true,

   state:{
      user:{}
   },
   getters:{
      getAuthUser(state){
     return state.user;
      }
   },
   actions:{
       getUser(context){
         Axios.get('/user')
         .then((result) =>{

            context.commit('getUser',result.data.user)
         }).catch((err) =>{

         });

       },
       userLogout(context){
         Axios.post('/logout')
         .then(res =>{
         context.commit('getUser',res.user)
       })
    }
   },
   mutations:{
    getUser(state,payload){
       return state.user = payload
    }
   }
}
