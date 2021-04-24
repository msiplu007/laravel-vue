import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

import {user} from './modules/user'
import {admin} from './modules/admin'
import {category} from './modules/category'
import {brand} from './modules/brand'
import {product} from './modules/product'



export const store = new Vuex.Store({
    modules: {
     user : user,
     admin : admin,
     category :category,
     brand : brand,
     product : product,

    }
  })
