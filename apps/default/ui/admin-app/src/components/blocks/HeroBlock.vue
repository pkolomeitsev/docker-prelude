<script setup lang="ts">
import ProjectSelection from './ProjectSelectionBlock.vue'
import ToolsNavigation from './ToolsNavigationBlock.vue'
// import ThinkingIcon from '../icons/ThinkingIcon.vue'
import Waves from '../animation/WaveComponent.vue'
defineProps(['projects', 'tools'])
</script>
<template>
  <!--Hero-->
  <div class="hero pt-24">
    <div class="container mx-auto flex flex-col flex-wrap items-center px-4 md:flex-row">
      <!--Left Col-->
      <div
        class="z-20 flex w-full flex-col items-start justify-center text-center md:w-2/5 md:text-left"
      >
        <ProjectSelection :projects="projects" />
      </div>
      <!--Right Col-->
      <div class="w-full py-6 text-center md:w-3/5">
        <!-- <ThinkingIcon /> -->
      </div>
      <div class="z-10 w-full">
        <ToolsNavigation :tools="tools" />
      </div>
    </div>
  </div>
  <section class="waves h-full w-full"><Waves /></section>
</template>
