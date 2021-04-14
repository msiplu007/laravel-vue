import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import {user} from './modules/user'
import {admin} from './modules/admin'
import {category} from './modules/category'



export const store = new Vuex.Store({
    modules: {
     user : user,
     admin : admin,
     category :category

    }
  })
