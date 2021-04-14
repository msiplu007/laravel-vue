<template>
     <div>
           <h3>Home page</h3>{{ myName }}
     </div>
</template>


<script>
export default {
  name:"Home",
    data() {
        return{
           name: this.$store.state.name,
           myName: this.$store.getters['user/myName']
        }
    }
}
</script>

<style lang="">

</style>
