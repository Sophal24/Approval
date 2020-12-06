<template>
  <div class="container flex justify-center">
    <div>
      <h1 class="title">Welcome, {{ name }}</h1>
    </div>
    <div>
      <h1 class="justify-center">
        Rapidly build modern websites without ever leaving your HTML. A
        utility-first CSS framework packed with classes like flex, pt-4,
        text-center and rotate-90 that can be composed to build any design,
        directly in your markup.
      </h1>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Sophal",
      age: 22,
    };
  },
  mounted() {
    console.log(this.name);
    console.log(this.age);
  },
};
</script>

<style scoped>
.container {
  justify-content: center;
  display: flex;
  flex-direction: column;
  text-align: center;
}
.title {
  font-weight: bolder;
}
</style>