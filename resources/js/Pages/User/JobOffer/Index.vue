<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Success from "@/Components/Alert/Success.vue";

defineProps({
    job_posted: Array,
});
let form = useForm({});
let deleteJobPost = (jobPost) => {
    form.delete(route("job-offer.destroy", jobPost), {
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
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 w-full">
                        <div class="flex justify-end mb-2">
                            <Link
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                :href="route('job-offer.create')"
                            >
                                Post Job Offer
                            </Link>
                        </div>
                        <div
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-50 active:bg-gray-100 mb-2"
                            v-for="job in job_posted.data"
                            :key="job.id"
                        >
                            <div
                                class="px-6 py-4 border-b flex justify-between items-center"
                            >
                                <div class="text-gray-900">
                                    {{ job.title }}
                                    <div class="text-xs text-gray-400">
                                        {{ job.work_setup }}
                                    </div>
                                </div>

                                <div
                                    class="text-xs text-gray-400"
                                    :class="[
                                        job.is_available
                                            ? 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300'
                                            : 'bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300',
                                    ]"
                                >
                                    {{
                                        job.is_available ? "Active" : "Inactive"
                                    }}
                                </div>

                                <div class="text-xs text-gray-400">
                                    {{ job.applicant_count }}
                                </div>

                                <div class="text-xs text-gray-400">
                                    {{ job.created_at }}
                                </div>

                                <div class="text-gray-900 text-sm">
                                    <Link
                                        class="font-medium text-gray-300 mr-2"
                                        :href="route('job-offer.show', job)"
                                        >View</Link
                                    >
                                    <button
                                        class="font-xs text-gray-300 mr-2"
                                        @click="deleteJobPost(job)"
                                    >
                                        Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
