import {defaultConfig} from '@formkit/vue'
import {generateClasses} from "@formkit/themes";


export default defaultConfig({
    config: {
        classes: generateClasses({
            text: {
                input: 'border rounded-md p-2 w-full'
            },
            number: {
                input: 'border rounded-md p-2 w-full'
            },
            date: {
                input: 'border rounded-md p-2 w-full'
            },
            select: {
                input: 'form-select border rounded-md p-2 w-full'
            },
            radio:{
                input: 'form-radio'
            },
            checkbox:{
                input: 'form-checkbox'
            },
            textarea:{
                input: 'form-textarea'
            },
            submit: {
                input:
                    'bg-green-700 text-white rounded-md p-2 mt-3 w-fit'

            }
        })
    }
})
