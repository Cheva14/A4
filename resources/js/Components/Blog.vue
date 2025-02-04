<script setup>
defineProps(['blog']);
</script>
 
<template>
    <div class="max-h-40 w-80 p-6 cursor-pointer p-4 border border-gray-300 rounded-md shadow-sm text-left">
        <div class="p-6 flex space-x-2">
            <div class="flex-1 text-left">
                <div class="flex flex-col">
                    <span class="text-sm text-gray-800">Author: {{ blog.user.name }}</span>
                    <small class="text-xs text-gray-600">{{ new Date(blog.created_at).toLocaleString() }}</small>
                </div>
                <p class="mt-4 text-sm text-gray-900">
                    {{ blog.content.length > 100 ? blog.content.substring(0, 100) + '...' : blog.content }}
                </p>
            </div>
        </div>
    </div>
</template>