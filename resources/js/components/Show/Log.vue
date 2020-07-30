<template>
    <tr>
        <td class="p-4">
            <p class="mb-4">
                <span :style="{'background-color' : getColor(entry.level) }" class="rounded-lg inline-block px-3 py-1 text-sm text-white font-semibold mr-3">
                {{ entry.level.toUpperCase() }}
                </span>
                <span class="font-semibold text-sm">
                    Time : {{ entry.datetime }}
                </span>

            </p>
            <p class="px-4 font-mono text-xs">
                {{ entry.header }}
            </p>
        </td>
        <td class="p-2">
            <button
                v-if="entry.stack.length > 2"
                class="bg-transparent hover:bg-primary text-primary border-primary font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded"
                @click.prevent="$emit('stack')"
            >
                Stack
            </button>
        </td>
    </tr>
</template>
co
<script>
    import color from '../../utils/color'
    export default {
        name: "Log",
        props: ['entry'],
        methods : {
            getColor (level) {
                return color(level)
            }
        }
    }
</script>

<style scoped>

</style>
