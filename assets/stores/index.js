import { defineStore } from 'pinia'

export const useDefaultStore = defineStore({
    id: 'default',
    state: () => ({

        urlGalerie:'http://127.0.0.1:8001/api/lieus',
        lieu: [
            'Futuroscope',
            'Puy du Fou',
            'Marais Poitevin',
            'Aquarium',
        ]

    }),
    getters: {


    },
    actions: {

    }
})