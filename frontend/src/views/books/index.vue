<script setup>

//import ref and onMounted
import { ref, onMounted } from 'vue';

//import api
import api from '../../api';

//define state
const books = ref([]);

//method fetchDataPosts
const fetchDataBooks = async () => {

    //fetch data
    await api.get('/api/book-titles')

        .then(response => {

            //set response data to state "posts"
            books.value = response.data.data.data

        });
}

//run hook "onMounted"
onMounted(() => {

    //call method "fetchDataPosts"
    fetchDataBooks();
});

const deleteBook = async (id) => {
    await api.delete(`/api/book-titles/${id}`)
        .then(() => {

            //call method "fetchDataPosts"
            fetchDataBooks();
        })

}

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'books.create' }" class="btn btn-md btn-success rounded shadow border-0 mb-3">Tambah Judul Buku</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">Gambar Cover</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Pengarang</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col" style="width:15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="books.length == 0">
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(book, index) in books" :key="index">
                                    <td class="text-center">
                                        <img :src="book.cover" width="200" class="rounded-3" />
                                    </td>
                                    <td>{{ book.title }}</td>
                                    <td>{{ book.author }}</td>
                                    <td>{{ book.publisher }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'books.edit', params: { id: book.id } }" class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deleteBook(book.id)" class="btn btn-sm btn-danger rounded-sm shadow border-0">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
