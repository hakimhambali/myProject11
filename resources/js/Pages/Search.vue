<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  name: null,
  isbn: null,
})

function submit() {
  router.post('/books/results', form)
}
</script>

<!-- <script>
  export default {
      mounted() {
          console.log('mounted')
      },
      data() {
        return {bookvar:'testwoi'}
      },
      methods:{
        selectbook(book){
          this.bookvar = book
        }
      }
  }
</script> -->

<template>
    <form @submit.prevent="submit">
        <label for="name">Name:</label>
        <input id="name" v-model="form.name" />
        <label for="isbn">ISBN:</label>
        <input id="isbn" v-model="form.isbn" />
        <button type="submit">Submit</button>
    </form>
         
    <!-- <p>Search Books... {{ message }}</p>
    <input v-model="message" placeholder="enter name or ISBN here" />
    <button @click="selectbook(book)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        search
    </button> -->
</template>
