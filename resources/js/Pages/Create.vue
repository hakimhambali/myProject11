<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

const form = reactive({
  name: null,
  genre: null,
  isbn: null,
  author: null,
  description: null,
})

const state = reactive({
  isSubmitting: false,
})

function submit() {
  submitForm();
  toast('New book created successfully!', {
    autoHideDelay: 5000,
  });
  setTimeout(() => {
    router.post('/books/store', form);
    console.log('After delay');
  }, 2000);
}

function submitForm() {
  state.isSubmitting = true;
  console.log('woi');
}

defineProps({ errors: Object })

</script>

<script>
  export default {
      mounted() {
          console.log('mounted')
      },
  }
</script>

<template>
  <form @submit.prevent="submit">
    
    <label for="name">Name:</label>
    <input id="name" v-model="form.name" />
    <div v-if="errors.name">{{ errors.name }}</div>
    <!-- <p v-if="$page.errors.author" class="error-message">{{$page.errors.name[0]}}</p> -->
    
    <label for="genre">Genre:</label>
    <input id="genre" v-model="form.genre" />
    <div v-if="errors.genre">{{ errors.genre }}</div>
    
    <label for="isbn">ISBN:</label>
    <input id="isbn" v-model="form.isbn" />
    <div v-if="errors.isbn">{{ errors.isbn }}</div>
    
    <label for="author">Author:</label>
    <input id="author" v-model="form.author" />
    <div v-if="errors.author">{{ errors.author }}</div>
    
    <label for="description">Description:</label>
    <input id="description" v-model="form.description" />
    <div v-if="errors.description">{{ errors.description }}</div>
    <!-- <button type="submit">Submit</button> -->
    
    <button type="submit" :disabled="state.isSubmitting">Submit</button>

  </form>

  <!-- <form @submit.prevent="submit">
    <label for="first_name">First name:</label>
    <input id="first_name" v-model="form.first_name" />
    <div v-if="errors.first_name">{{ errors.first_name }}</div>
    <label for="last_name">Last name:</label>
    <input id="last_name" v-model="form.last_name" />
    <div v-if="errors.last_name">{{ errors.last_name }}</div>
    <label for="email">Email:</label>
    <input id="email" v-model="form.email" />
    <div v-if="errors.email">{{ errors.email }}</div>
    <button type="submit">Submit</button>
  </form> -->
</template>