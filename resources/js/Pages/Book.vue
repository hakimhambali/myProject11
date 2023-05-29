<script setup>
// import { BTable, BButton } from "bootstrap-vue";

defineProps({ books: Object })</script>

<script>
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
  // import { ref } from "vue";
  // let input = ref("");
  // const booksearchs = ["apple", "banana", "orange"];
  // function filteredList() {
  //   return booksearchs.filter((booksearch) =>
  //   booksearch.toLowerCase().includes(input.value.toLowerCase())
  // );
// }
</script>

<template>
    <div class="container">
      <!-- <input type="text" v-model="input" placeholder="Search books..." />
  <div class="item booksearch" v-for="booksearch in filteredList()" :key="booksearch">
    <p>{{ booksearch }}</p>
  </div> -->
  <!-- <div class="item error" v-if="input&&!filteredList().length">
     <p>No results found</p>
  </div> -->
        <table class="table table-bordered table-hover">
            <tr>
                <td style="padding: 10px;">Name</td>
                <td style="padding: 10px;">Genre</td>
                <td style="padding: 10px;">ISBN</td>
                <td style="padding: 10px;">Author</td>
            </tr>
            <template v-for="book in books">
                <tr @click="selectbook(book)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <td style="padding: 10px">{{ book.name }}</td>
                    <td style="padding: 10px">{{ book.genre }}</td>
                    <td style="padding: 10px">{{ book.isbn }}</td>
                    <td style="padding: 10px">{{ book.author }}</td>
                </tr>
                <!-- <button @click="selectbook(book)" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                </button> -->
            </template>
        </table>
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Description</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ bookvar.description }}                                                                                                                                                                                                                                                                                                                                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
}

body {
  padding: 20px;
  min-height: 100vh;
  background-color: rgb(234, 242, 255);
}

input {
  display: block;
  width: 350px;
  margin: 20px auto;
  padding: 10px 45px;
  background: white url("assets/search-icon.svg") no-repeat 15px center;
  background-size: 15px 15px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
    rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

.item {
  width: 350px;
  margin: 0 auto 10px auto;
  padding: 10px 20px;
  color: white;
  border-radius: 5px;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px,
    rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}

.booksearch {
  background-color: rgb(97, 62, 252);
  cursor: pointer;
}

.error {
  background-color: tomato;
}
</style>

