<?php
/** @noinspection PhpComposerExtensionStubsInspection */

function swoole_curl_init(string $url = ''): Swoole\Curl\Handler
{
    return new Swoole\Curl\Handler($url);
}

function swoole_curl_setopt(Swoole\Curl\Handler $obj, int $opt, $value): bool
{
    return $obj->setOption($opt, $value);
}

function swoole_curl_setopt_array(Swoole\Curl\Handler $obj, $array): bool
{
    foreach ($array as $k => $v) {
        if ($obj->setOption($k, $v) !== true) {
            return false;
        }
    }
    return true;
}

function swoole_curl_exec(Swoole\Curl\Handler $obj)
{
    return $obj->execute();
}

function swoole_curl_multi_getcontent(Swoole\Curl\Handler $obj): ?string
{
    return $obj->transfer;
}

function swoole_curl_close(Swoole\Curl\Handler $obj): void
{
    $obj->close();
}

function swoole_curl_error(Swoole\Curl\Handler $obj): string
{
    return $obj->errMsg;
}

function swoole_curl_errno(Swoole\Curl\Handler $obj): int
{
    return $obj->errCode;
}

function swoole_curl_reset(Swoole\Curl\Handler $obj): void
{
    $obj->reset();
}

function swoole_curl_getinfo(Swoole\Curl\Handler $obj, int $opt = 0)
{
    $info = $obj->getInfo();
    if ($opt) {
        switch ($opt) {
            case CURLINFO_EFFECTIVE_URL:
                return $info['url'];
            case CURLINFO_HTTP_CODE:
                return $info['http_code'];
            case CURLINFO_CONTENT_TYPE:
                return $info['content_type'];
            case CURLINFO_REDIRECT_COUNT:
                return $info['redirect_count'];
            case CURLINFO_REDIRECT_URL:
                return $info['redirect_url'];
            case CURLINFO_TOTAL_TIME:
                return $info['total_time'];
            case CURLINFO_STARTTRANSFER_TIME:
                return $info['starttransfer_time'];
            case CURLINFO_SIZE_DOWNLOAD:
                return $info['size_download'];
            case CURLINFO_SPEED_DOWNLOAD:
                return $info['speed_download'];
            case CURLINFO_REDIRECT_TIME:
                return $info['redirect_time'];
            case CURLINFO_HEADER_SIZE:
                return $info['header_size'];
            default:
                return null;
        }
    } else {
        return $info;
    }
}
