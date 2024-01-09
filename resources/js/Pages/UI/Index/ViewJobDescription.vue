<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Success from "@/Components/Alert/Success.vue";
import VisitorLayout from "@/Layouts/VisitorLayout.vue";
import UpperDesign from "./Partials/UpperDesign.vue";
import ApplicationModal from "./Partials/ApplicationModal.vue";

defineProps({
    viewJobDescription: Object,
});
let form = useForm({});
</script>
<template>
    <Head title="Job Description" />
    <Success />
    <VisitorLayout>
        <UpperDesign />
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 w-full">
                    <div class="flex justify-between mb-2 px-3">
                        <Link :href="route('job-list')">
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
                        <ApplicationModal
                            :job_id="viewJobDescription.data.id"
                            :employer_id="viewJobDescription.data.user_id"
                        />
                    </div>
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 py-3 px-3"
                    >
                        <span
                            class="font-bold flex justify-start mb-3 text-3xl text-gray-700"
                        >
                            {{ viewJobDescription.data.title }}
                        </span>
                        <span
                            class="text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-100"
                        >
                            {{ viewJobDescription.data.work_setup }}
                        </span>
                        <div>
                            <span
                                class="text-xs mr-1"
                                v-for="tag in viewJobDescription.data.tags"
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
                            {{ viewJobDescription.data.employment_settings }}
                        </div>
                        <div>
                            <span class="font-bold text-2xl text-gray-700">
                                Job Overview
                            </span>
                            <div class="text-gray-500">
                                {{
                                    viewJobDescription.data.description
                                        .full_details
                                }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="px-6 w-full">
                    <div
                        class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-2 px-3"
                    >
                        <span class="font-bold text-2xl text-gray-700">
                            Company Overview
                        </span>
                        <div class="flex mt-2">
                            <div class="mr-3">
                                <img
                                    class="h-20 max-w-xs rounded-md mb-3 mt-2"
                                    :src="viewJobDescription.data.company_logo"
                                    alt="image description"
                                />
                            </div>
                            <div>
                                <span class="font-bold text-gray-500">
                                    Company Name
                                </span>
                                <div class="text-gray-400">
                                    {{ viewJobDescription.data.company_name }}
                                </div>

                                <span class="font-bold text-gray-500">
                                    Address
                                </span>
                                <div class="text-gray-400">
                                    {{
                                        viewJobDescription.data.company_address
                                    }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </VisitorLayout>
</template>
