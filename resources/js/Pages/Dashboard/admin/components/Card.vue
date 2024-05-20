<template>
    <div :class="['relative p-4 w-full rounded-lg overflow-hidden shadow hover:shadow-md', user.block ? 'bg-gray-200' : 'bg-white']">
      <div class="flex items-center p-4 h-16">
        <img :src="user.profile_photo_url" class="h-14 w-14 py-4 flex-none rounded-full border-2" />
        <div class="ml-4 flex-auto">
          <div class="font-medium">
            {{ user.name }} <span class="text-slate-500">({{ user.is_admin ? 'Admin' : 'Client' }})</span>
          </div>
          <div class="mt-1 text-slate-500 text-sm">{{ user.email }}</div>
          <div class="mt-1 text-slate-500 text-sm">{{ user.tel }}</div>
        </div>
      </div>
      <div class="flex items-center justify-between w-full pt-4">
        <span></span>
        <Toggle :block="user.block" :idu="user.id" :user="user" />
      </div>
    </div>
  </template>
<script setup>
import Toggle from '../components/Tog'
const props = defineProps(['user']);
</script>
<style lang="">
    
</style>