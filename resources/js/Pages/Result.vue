<script setup>
defineProps({ books: Object })
</script>

<script>
  export default {
      mounted() {
          console.log('mounted')
      },
  }
</script>

<template>
        <div class="container">
            <table class="table table-bordered table-hover">
            <tr>
                <td style="padding: 10px;">Name</td>
                <td style="padding: 10px;">Genre</td>
                <td style="padding: 10px;">ISBN</td>
                <td style="padding: 10px;">Author</td>
            </tr>
            <template v-for="book in books">
                <tr>
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
        
    <!-- {{ books }} -->
</div>
</template>
