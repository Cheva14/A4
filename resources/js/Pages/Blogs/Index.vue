<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Blog from '@/Components/Blog.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm, Head } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps(['blogs']);

const form = useForm({
    title: '',
    content: '',
    is_published: true
});

const showModal = ref(false);

const openModal = () => {
    showModal.value = true;
};

const closeModal = () => {
    showModal.value = false;
};
</script>

<template>
    <Head title="Blogs" />

    <AuthenticatedLayout>
        <div class="flex max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 space-x-4">
                <Blog
                    v-for="blog in blogs"
                    :key="blog.id"
                    :blog="blog"
                />
            <div
                @click="openModal"
                class="max-h-40 w-80 p-6 cursor-pointer border border-gray-300 rounded-md shadow-sm text-left"
            >
                Add New Blog
            </div>
        </div>

        <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
            <div class="bg-white p-6 rounded-md shadow-md w-11/12 h-5/6 overflow-auto">
                <h2 class="text-lg font-semibold mb-4">Add New Blog</h2>
                <form @submit.prevent="form.post(route('blogs.store'), { onSuccess: () => { form.reset(); closeModal(); } })">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <div class="flex">
                            <input
                            id="title"
                            v-model="form.title"
                            type="text"
                            class="mt-1 block border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            />
                            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>

                        </div>
                        
                        <InputError :message="form.errors.title" class="mt-2" />
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                        <textarea
                            id="content"
                            v-model="form.content"
                            placeholder="What's on your mind?"
                            class="mt-1 block w-full h-80 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        ></textarea>
                        <InputError :message="form.errors.content" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                        <PrimaryButton class="mr-2" @click="closeModal">Cancel</PrimaryButton>
                        <PrimaryButton type="submit">Submit</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
