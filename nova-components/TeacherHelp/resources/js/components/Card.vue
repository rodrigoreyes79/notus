<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-8 w-2/3 leading-normal text-80" >
            <div class="text-center m-4">
                <img src="/img/logo.png" style="width: 50%;" class="mx-auto">
            </div>
            <h1 class="text-center text-2xl">Welcome to the <br/>Notus Homeschooling Journal System</h1>
            <p class="mt-4 font-light text-left">
                Notus helps Homeschoolers' parents and teachers keep track of the learning activities students engage in
                through their learning process. Here's a quick introduction on how to use it.
            </p>

        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    mounted() {
        //
    },
}
</script>
