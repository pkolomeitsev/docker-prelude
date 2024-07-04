<script setup lang="ts">
import Navigation from './blocks/NavBlock.vue'
import Hero from './blocks/HeroBlock.vue'
import Info from './blocks/InfoBlock.vue'
import Footer from './blocks/FooterBlock.vue'
import { LocalStorageHelper } from '@/models/helper/LocalStorageHelper'

const appConfig = LocalStorageHelper.getItem('config')
</script>

<template>
  <div class="gradient">
    <Navigation />
    <Hero :projects="appConfig.projects" :tools="appConfig.appList" />
  </div>
  <Info :systemInfo="appConfig.systemInfo" />
  <Footer />
</template>
