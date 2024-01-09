<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Success from "@/Components/Alert/Success.vue";

defineProps({
    applications: Array,
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
    <Head title="Applicants" />

    <AuthenticatedLayout>
        <Success />
        <div class="py-12">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 w-full">
                        <div class="flex justify-start mb-2">
                            <Link>
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
                        </div>
                        <div
                            class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-50 active:bg-gray-100 mb-2"
                        >
                            <div class="relative overflow-x-auto shadow-md">
                                <table
                                    class="w-full text-sm text-left rtl:text-right"
                                >
                                    <thead
                                        class="text-xs text-gray-100 uppercase bg-gray-800"
                                    >
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <input
                                                        id="checkbox-all-search"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                                    />
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Role
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Email
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Message
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Submitted
                                            </th>
                                            <th
                                                scope="col"
                                                class="px-6 py-3 flex justify-end"
                                            >
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="border-b bg-white dark:hover:bg-gray-100"
                                            v-for="application in applications.data"
                                            :key="application.id"
                                        >
                                            <td class="w-4 p-4">
                                                <div class="flex items-center">
                                                    <input
                                                        id="checkbox-table-search-3"
                                                        type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded"
                                                    />
                                                </div>
                                            </td>
                                            <td
                                                class="px-6 py-4 flex justify-start w-64"
                                            >
                                                {{
                                                    application.job_description
                                                        .title
                                                }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{
                                                    application.applicant_email
                                                }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{
                                                    application.short_message
                                                        .limit
                                                }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ application.created_at }}
                                            </td>

                                            <td
                                                class="flex justify-end px-6 py-4"
                                            >
                                                <a
                                                    href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                                    >View</a
                                                >
                                                <a
                                                    href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline ms-3"
                                                    >Reply</a
                                                >
                                                <a
                                                    href="#"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3"
                                                    >Remove</a
                                                >
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
