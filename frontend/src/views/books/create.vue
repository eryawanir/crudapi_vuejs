<script setup>
//import ref
import { ref } from "vue";

//import router
import { useRouter } from 'vue-router';

//import api
import api from "../../api";

//init router
const router = useRouter();

//define state
const cover = ref("");
const title = ref("");
const author = ref("");
const publisher = ref("");
const errors = ref([]);

//method for handle file changes
const handleFileChange = (e) => {
    //assign file to state
    cover.value = e.target.files[0];
};

//method "storePost"
const storeBook = async () => {

    //init formData
    let formData = new FormData();

    //assign state value to formData
    formData.append("cover", cover.value);
    formData.append("title", title.value);
    formData.append("author", author.value);
    formData.append("publisher", publisher.value);

    //store data with API
    await api.post('/api/book-titles', formData)
        .then(() => {
            //redirect
            router.push({ path: "/books" });
        })
        .catch((error) => {
            //assign response error data to state "errors"
            errors.value = error.response.data;
        });
};
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="storeBook()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Gambar Cover</label>
                                <input type="file" class="form-control" @change="handleFileChange($event)">
                                <div v-if="errors.cover" class="alert alert-danger mt-2">
                                    <span>{{ errors.cover[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Judul</label>
                                <input type="text" class="form-control" v-model="title" placeholder="Judul Buku">
                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                    <span>{{ errors.title[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Pengarang</label>
                                <input type="text" class="form-control" v-model="author" placeholder="Pengarang Buku">
                                <div v-if="errors.author" class="alert alert-danger mt-2">
                                    <span>{{ errors.author[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Penerbit</label>
                                <input type="text" class="form-control" v-model="publisher" placeholder="Penerbit Buku">
                                <div v-if="errors.publisher" class="alert alert-danger mt-2">
                                    <span>{{ errors.publisher[0] }}</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
