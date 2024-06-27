<script setup lang="ts">
import Navigation from './blocks/NavBlock.vue'
import Hero from './blocks/HeroBlock.vue'
import Info from './blocks/InfoBlock.vue'
import Footer from './blocks/FooterBlock.vue'

const props = defineProps(['appConfig'])
</script>

<template>
  <div class="gradient">
    <Navigation :appName="appConfig.appName" :gitHubLink="appConfig.gitHubLink" />
    <Hero />
  </div>
  <Info :systemInfo="appConfig.systemInfo" />
  <Footer />
</template>
