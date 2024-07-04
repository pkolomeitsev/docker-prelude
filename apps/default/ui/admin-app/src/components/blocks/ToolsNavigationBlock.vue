<script setup lang="ts">
import { RouterLink } from 'vue-router'
import type { AppDTO } from '@/models/dto/AppDTO'
import { AppAggregator } from '@/models/aggregate/AppAggregator'
import { InternalAppRegistry } from '@/models/InternalAppRegistry'

const props = defineProps(['tools'])

// internal apps (SPA)
const appsInternal = new AppAggregator()
appsInternal.addApps(InternalAppRegistry.getAppList())

// external apps
const appsExternal = new AppAggregator()
for (const key in props.tools) {
  let tool: AppDTO = props.tools[key]
  if (!tool.title) {
    tool.title = key
  }
  appsExternal.addApps([tool])
}
</script>
<template>
  <h1>Tools</h1>
  <RouterLink
    v-for="(dto, key, index) in appsInternal.getApps()"
    :to="dto.link"
    :key="index"
    class="btn btn-light mb-2 inline-block"
  >
    {{ dto.title }}
  </RouterLink>
  <a
    v-for="(dto, key, index) in appsExternal.getApps()"
    :href="dto.link"
    :key="index"
    class="btn btn-light mb-2 inline-block"
    target="_blank"
  >
    {{ dto.title }}
  </a>
</template>
