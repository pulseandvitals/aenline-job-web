<script setup>
import { Head, Link } from "@inertiajs/vue3";
import JobSearchInput from "@/Components/JobSearchInput.vue";
import UpperDesign from "./Partials/UpperDesign.vue";
import Success from "@/Components/Alert/Success.vue";

defineProps({
    jobList: Array,
});
</script>

<template>
    <Head title="Welcome" />

    <UpperDesign />

    <JobSearchInput />

    <Success />

    <section>
        <div
            class="mx-auto max-w-screen-md py-3"
            v-for="job in jobList.data"
            :key="job.id"
        >
            <article
                class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm"
            >
                <div class="flex justify-between items-center text-gray-500">
                    <div>
                        <span
                            class="text-xs font-medium me-2 px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-100"
                            >{{ job.work_setup }}</span
                        >
                    </div>

                    <span class="text-sm">{{ job.created_at }}</span>
                </div>
                <div>
                    <span
                        class="text-xs mr-1"
                        v-for="tag in job.tags"
                        :key="tag.id"
                        :class="[
                            tag
                                ? 'text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-100'
                                : '',
                        ]"
                    >
                        {{ tag }}
                    </span>
                </div>
                <div class="text-xs text-gray-400">
                    <span>{{ job.employment_settings }}</span>
                </div>
                <div class="font-bold text-gray-600 text-lg">
                    <span>{{ job.title }}</span>
                </div>
                <div class="mb-5 text-gray-500 dark:text-gray-400">
                    <span>{{ job.description.limit }} </span>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <img
                            class="w-7 h-7 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Green avatar"
                        />
                        <span class="font-medium">
                            {{ job.created_by.name }}</span
                        >
                    </div>
                    <Link
                        :href="
                            route('view-job-description', {
                                viewJobDescription: job,
                            })
                        "
                        class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline"
                    >
                        Read more
                        <svg
                            class="ml-2 w-4 h-4"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </Link>
                </div>
            </article>
        </div>
    </section>
</template>
