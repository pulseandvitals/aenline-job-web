<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Success from "@/Components/Alert/Success.vue";
import CompanyOverview from "./Partials/CompanyOverview.vue";

defineProps({
    view_job_offer: Object,
});
let form = useForm({});
let deleteJobPost = (jobOffer) => {
    form.delete(route("job-offer.destroy", jobOffer), {
        onBefore: () => confirm("Do you want to delete this job post?"),
        preserveScroll: true,
    });
};
</script>
<template>
    <Head title="Job Offer" />

    <AuthenticatedLayout>
        <Success />
        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 w-full">
                        <div class="flex justify-between mb-2 px-3">
                            <Link :href="route('job-offer.index')">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3"
                                    />
                                </svg>
                            </Link>
                            <button @click="deleteJobPost(view_job_offer.data)">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 text-red-500"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                    />
                                </svg>
                            </button>
                        </div>
                        <div
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 py-3 px-3"
                        >
                            <span
                                class="font-bold flex justify-start mb-3 text-3xl text-gray-700"
                            >
                                {{ view_job_offer.data.title }}
                            </span>
                            <span
                                class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-100"
                            >
                                {{ view_job_offer.data.work_setup }}
                            </span>
                            <div>
                                <span
                                    class="text-xs mr-1"
                                    v-for="tag in view_job_offer.data.tags"
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
                            <div class="text-gray-500">
                                {{ view_job_offer.data.employment_settings }}
                            </div>
                            <div>
                                <span class="font-bold text-2xl text-gray-700">
                                    Overview
                                </span>
                                <div class="text-gray-500">
                                    {{
                                        view_job_offer.data.description
                                            .full_details
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <CompanyOverview :view_job_offer="view_job_offer" />
        </div>
    </AuthenticatedLayout>
</template>
