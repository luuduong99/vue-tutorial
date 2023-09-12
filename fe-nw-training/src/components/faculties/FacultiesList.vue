<script setup>
import {ref, onMounted } from "vue";
import { RouterLink } from "vue-router";
import axios from "axios";

const responseData = ref(null);
const currentPage = ref(1);
const last_page = ref(null);
const fetchData = async () => {
  try {
    const response = await axios.get(`http://nw_training.test/api/faculties?page=${currentPage.value}`);
    responseData.value = response.data.data;
    last_page.value = response.data.last_page;
  } catch (error) {
    console.error(error);
  }
};
const goToNextPage = () => {
  currentPage.value++; // Tăng trang hiện tại lên 1
  fetchData(); // Gọi lại hàm fetchStudentList với trang mới
};

const goToPeriousPage = () => {
  currentPage.value--;
  fetchData();
}

const changePage = (pageNumber) => {
  currentPage.value = pageNumber;
  fetchData();
}

onMounted(() => {
  if (!responseData.value) {
    fetchData();
  }
});
</script>

<template>
  <div style="width: 100%; display: flex;justify-content: space-between">
    <div class="col-sm-4" style="padding: 0">
      <RouterLink to="/admin/faculties/create">
        <a  class="btn btn-success mb-2"><i
            class="mdi mdi-plus-circle mr-2"></i>
          Add Faculty
        </a>
      </RouterLink>
    </div>
  </div>
  <table class="table table-striped table-centered mb-0">
    <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Created_at</th>
      <th>Updated_at</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody v-for="faculty in responseData">
    <tr>
      <td><a href="">{{ faculty.name }}</a>
      </td>
      <td>{{ faculty.description }}</td>
      <td>{{ faculty.created_at }}</td>
      <td>{{ faculty.updated_at }}</td>
      <td class="table-action">
        <a href="" class="btn btn-primary">
          <i class="mdi mdi-square-edit-outline"></i></a>
        <button class="btn btn-danger delete-faculty" value="">
          <i class="mdi mdi-delete"></i>
        </button>
      </td>
    </tr>
    </tbody>
  </table>
  <ul class="pagination">
    <li class="page-item"><a href="" @click.prevent="goToPeriousPage" class="page-link">Perious Page</a></li>
    <li class="page-item" v-for="page in last_page" :key="page">
      <a href="" @click.prevent="changePage(page)" class="page-link">{{ page }}</a>
    </li>
    <li class="page-item"><a href="" @click.prevent="goToNextPage" class="page-link">Next Page</a></li>
  </ul>
</template>

<style scoped>

</style>