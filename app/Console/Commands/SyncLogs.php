<?php

namespace App\Console\Commands;

use App\Repositories\LogRepository;
use App\Services\SyncService\Data\LogData;
use App\Services\SyncService\SyncService;
use Illuminate\Console\Command;
use Kassner\LogParser\LogParser;

class SyncLogs extends Command
{
    // Test path file
    const LOG_FILE = 'http://www.almhuette-raith.at/apache-log/access.log';

    const ERROR_MESSAGES = [
        'open_error_file' => 'File open error.',
        'invalid_file' => 'Invalid file!',
    ];

    protected $signature = 'sync:logs';

    protected $description = 'Sync logs from file.loc to db.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $logParser = new LogParser();
        $logParser->setFormat('%h %l %u %t "%r" %>s %O "%{Referer}i" \"%{User-Agent}i"');

        $syncService = new SyncService(new LogRepository);

        $handle = @fopen(self::LOG_FILE, 'rb');

        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                try {
                    $row = trim($buffer);

                    if ($row === '') {
                        continue;
                    }

                    $entry = $logParser->parse($row);
                    $data = new LogData($entry);

                    if ($syncService->sync($data)) {
                        $this->output->text($row);
                    } else {
                        $this->output->text('.');
                    }
                } catch (\Exception $exception) {
                    $this->output->error($exception->getMessage());
                }
            }

            if (!feof($handle)) {
                $this->output->error(self::ERROR_MESSAGES['invalid_file']);
            }

            fclose($handle);
        } else {
            $this->output->error(self::ERROR_MESSAGES['open_error_file']);
        }
    }
}
