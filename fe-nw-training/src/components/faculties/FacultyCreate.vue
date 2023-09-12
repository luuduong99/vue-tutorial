<script setup>
import { ref } from "vue";
import axios from "axios";

const faculty = ref({
  name: '',
  description: ''
});
const errors = ref({},);
const sendData = async () => {
  try {
    await axios.post(`http://nw_training.test/api/faculties/store`, faculty.value);

  } catch (error) {
    errors.value  = error.response.data.errors;
    console.error('Error creating task:', errors);
  }
}

</script>

<template>
  <div class="error" v-if="Object.keys(errors).length > 0">
    <p v-for="error in Object.values(errors).flat()" :key="error">{{ error }}</p>
  </div>
  <form @submit.prevent="sendData" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="name" class="form-label">Faculty Name</label>
      <input type="text" class="form-control" id="name" v-model="faculty.name">
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" class="form-control" id="description" v-model="faculty.description">
    </div>
    <button class="btn btn-primary">Save</button>
  </form>

  <div>
    <h2>User Data:</h2>
    <p>Name: {{ faculty.name }}</p>
    <p>Description: {{ faculty.description }}</p>
  </div>

</template>

<style scoped>

</style>