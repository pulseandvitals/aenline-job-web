<script setup>
defineProps({
    view_job_offer: Object,
});
</script>
<template>
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
                                :src="view_job_offer.data.company_logo"
                                alt="image description"
                            />
                        </div>
                        <div>
                            <span class="font-bold text-gray-500">
                                Company Name
                            </span>
                            <div class="text-gray-400">
                                {{ view_job_offer.data.company_name }}
                            </div>

                            <span class="font-bold text-gray-500">
                                Address
                            </span>
                            <div class="text-gray-400">
                                {{ view_job_offer.data.company_address }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
