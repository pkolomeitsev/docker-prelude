<script setup>
import Navigation from './blocks/NavBlock.vue'
import Footer from './blocks/FooterBlock.vue'
</script>
<template>
  <Navigation class="internalApp bg-gray-100" />
  <section class="container mx-auto mt-14 h-full bg-white py-4">
    <iframe width="100%" height="100%" src="http://localhost/api/php-info"></iframe>
  </section>
  <Footer />
</template>
