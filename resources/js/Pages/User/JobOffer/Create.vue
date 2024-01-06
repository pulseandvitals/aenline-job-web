<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import Success from "@/Components/Alert/Success.vue";
import TextInput from "@/Components/TextInput.vue";
import { nextTick, ref } from "vue";

const form = useForm({
    company_name: "",
    company_logo: "",
    company_address: "",
    title: "",
    description: "",
    work_setup: "",
    employment_settings: "",
    tags: ref([]),
});
</script>

<template>
    <Head title="Create" />

    <AuthenticatedLayout>
        <Success />

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 w-full">
                        <form
                            class="space-y-6"
                            @submit.prevent="
                                form.post(route('job-offer.store'))
                            "
                        >
                            <div class="">
                                <span class="text-gray-600 font-bold">
                                    Job Information
                                </span>
                            </div>
                            <div>
                                <InputLabel for="name" value="Company Name" />

                                <TextInput
                                    id="company_name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.company_name"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.company_name"
                                />
                            </div>

                            <div>
                                <InputLabel for="email" value="Company Logo" />

                                <TextInput
                                    id="company_logo"
                                    type="file"
                                    class="mt-1 block w-full"
                                    v-model="form.company_logo"
                                />
                                <span class="text-gray-300 text-xs">
                                    Note that this is Optional. If you don't
                                    provide image of your company, it will
                                    automatically provide your avatar instead.
                                </span>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.company_logo"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="Address"
                                    value="Company Address"
                                />

                                <TextInput
                                    id="company_address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.company_address"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.company_address"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="Title"
                                    value="Job Title (required)"
                                />

                                <TextInput
                                    name="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                />

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.title"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="Description"
                                    value="Job Description (required)"
                                />

                                <textarea
                                    id="message"
                                    rows="4"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    placeholder="Write Job description here.."
                                    v-model="form.description"
                                ></textarea>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.description"
                                />
                            </div>

                            <div>
                                <InputLabel for="Setup" value="Work Setup" />

                                <select
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    name="work_setup"
                                    v-model="form.work_setup"
                                >
                                    <option value="hybrid">Hybrid</option>
                                    <option value="work_from_home">
                                        Work from Home
                                    </option>
                                    <option value="office_based">
                                        Office Based
                                    </option>
                                </select>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.work_setup"
                                />
                            </div>

                            <div>
                                <InputLabel
                                    for="Setup"
                                    value="Employment Settings"
                                />

                                <select
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    name="employment_settings"
                                    v-model="form.employment_settings"
                                >
                                    <option value="Full-Time">Full-Time</option>
                                    <option value="Part-Time">Part-Time</option>
                                    <option value="Gig">Gig</option>
                                    <option value="TBD">To be discussed</option>
                                </select>

                                <InputError
                                    class="mt-2"
                                    :message="form.errors.work_setup"
                                />
                            </div>

                            <div>
                                <InputLabel for="Tags" value="Job Tags" />
                                <div class="flex justify-between">
                                    <TextInput
                                        name="tags"
                                        type="text"
                                        class="mt-1 block w-full mr-2"
                                        v-model="form.tags"
                                    />
                                </div>
                                <div>
                                    <span class="text-xs text-gray-300">
                                        Just put comma "," for specification of
                                        tagging.
                                    </span>
                                </div>
                                <div>
                                    <span class="font-medium text-gray-300">
                                        Tagging: {{ form.tags }}
                                    </span>
                                </div>
                                <InputError
                                    class="mt-2"
                                    :message="form.errors.tags"
                                />
                            </div>

                            <div class="flex items-center gap-4 justify-end">
                                <PrimaryButton
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                    >Post</PrimaryButton
                                >
                                <ButtonLink>Back</ButtonLink>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
