<script setup>
import { Head, Link } from "@inertiajs/vue3";
import JobSearchInput from "@/Components/JobSearchInput.vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
    <Head title="Aenline Job" />
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2
                    class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
                >
                    Find job offers for free without login.
                </h2>
                <p
                    class="font-light text-gray-500 sm:text-xl dark:text-gray-400"
                >
                    We use an agile approach to test assumptions and connect
                    with the needs of your audience early and often.
                </p>
            </div>
        </div>
    </section>
    <JobSearchInput />
    <section>
        <div class="mx-auto max-w-screen-md py-3">
            <article
                class="p-6 bg-white rounded-lg border border-gray-200 shadow-sm"
            >
                <div
                    class="flex justify-between items-center mb-5 text-gray-500"
                >
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300"
                        >Work From Home</span
                    >
                    <span class="text-sm">14 days ago</span>
                </div>
                <div class="font-bold text-gray-600 text-lg">
                    <span>Looking for Laravel Developer</span>
                </div>
                <div class="mb-5 text-gray-500 dark:text-gray-400">
                    <span>
                        Static websites are now used to bootstrap lots of
                        websites and are becoming the basis for a variety of
                        tools that even influence both web designers and
                        developers influence both web designers and developers.
                    </span>
                </div>

                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <img
                            class="w-7 h-7 rounded-full"
                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                            alt="Bonnie Green avatar"
                        />
                        <span class="font-medium"> AU Developers</span>
                    </div>
                    <a
                        href="#"
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
                    </a>
                </div>
            </article>
        </div>
    </section>
</template>
