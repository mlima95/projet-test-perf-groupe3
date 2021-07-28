import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '30s', target: 100 }, // below normal load
        { duration: '1m', target: 100 },
        { duration: '30s', target: 200 }, // normal load
        { duration: '1m', target: 200 },
        { duration: '30s', target: 300 }, // around the breaking point
        { duration: '1m', target: 300 },
        { duration: '30s', target: 400 }, // beyond the breaking point
        { duration: '2m', target: 400 },
        { duration: '2m', target: 0 }, // scale down. Recovery stage.
    ],
};

export default function () {
    const BASE_URL = 'https://test-api.k6.io'; // make sure this is not production

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
