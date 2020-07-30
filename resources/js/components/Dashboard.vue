<template>
    <div>
        <heading class="mb-6">Nova Log Viewer</heading>

        <!-- Three columns -->
        <div class="flex mb-4">
            <div class="w-1/3 card p-2">
                <div class="mt-4">
                    <doughnut-chart
                        :chart-data="dataCollection"
                        :options="{responsive: true, maintainAspectRatio: true}"
                        :height="400">
                    </doughnut-chart>
                </div>
            </div>
            <div>
                <div class="flex flex-wrap -my-2 ml-2">
                    <div class="w-1/3" v-for="(percent, key) in percents" :key="key">
                        <div class="max-w-sm overflow-hidden card m-3 py-2" :style="percent.count !== 0 ? 'color: #FFF;background-color :' + percent.backgroundColor : '' ">
                            <div class="px-6 py-4">
                                <div class="font-bold text-xl mb-2">{{ percent.name }}</div>
                                <p class="text-grey-darker text-base">
                                    {{ percent.count }} entries - {{ percent.percent }}%
                                </p>
                                <div class="progress mt-3 rounded h-2 text-gray-800">
                                    <div class="bar rounded h-100" :style="{ width: percent.percent + '%' }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import DoughnutChart from '../plugins/DoughnutChart'
    import axios from 'axios'

    export default {
        components: {
            DoughnutChart
        },
        data () {
            return {
                dataCollection: {},
                percents: {}
            }
        },
        mounted () {
            this.getChartData()
        },
        methods: {
            getChartData () {
                axios.get('/nova-vendor/iblacker/nova-log-viewer/get_chart_data')
                    .then(({data}) => {
                        this.dataCollection = data.chartData
                        this.percents = data.percents
                    })
            }
        }
    }
</script>

<style>
    .progress {
        width: 100%;
        background-color: #333;
    }

    .bar {
        height: 100%;
        background-color: #FFF;
    }
</style>
