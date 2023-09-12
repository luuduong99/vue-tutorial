<script setup>
import {ref} from "vue";

const user = ref({
  email: '',
  password: '',
});

const login = () => {
  console.log(user);
}

</script>

<template>
  <form @submit.prevent="login">
    <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="text" class="form-control" id="email" aria-describedby="emailHelp" v-model="user.email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" v-model="user.password">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <div>
    <h1>User Data</h1>
    <p>Email: {{ user.email }}</p>
    <p>Password: {{ user.password }}</p>
  </div>
</template>

<style scoped>
form {
  width: 500px;
  margin: 0 auto;
}
</style>