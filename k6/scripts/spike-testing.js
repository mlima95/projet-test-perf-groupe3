import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '10s', target: 100 }, // below normal load
        { duration: '1m', target: 100 },
        { duration: '10s', target: 1400 }, // spike to 1400 users
        { duration: '1m', target: 1400 }, // stay at 1400 for 3 minutes
        { duration: '10s', target: 100 }, // scale down. Recovery stage.
        { duration: '1m', target: 100 },
        { duration: '10s', target: 0 },
    ],
};
export default function () {
	const BASE_URL = 'http://localhost:8000';

    let responses = http.batch([
        [
            'GET',
            `${BASE_URL}/call/center/normal/`,
            null,
            { tags: { name: 'CallCenter' } },
        ],
        [
            'GET',
            `${BASE_URL}/inventory/800000`,
            null,
            { tags: { name: 'Inventory' } },
        ],

    ]);

    sleep(1);
}
