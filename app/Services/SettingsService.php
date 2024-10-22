<?php

    namespace App\Services;

    use App\Models\Setting;
    use Cache;

    class SettingsService
    {
        function setGlobalSetting()
        {
            $settings = $this->getSetting();
            config()->set('settings', $settings);
        }

        function getSetting()
        {
            return Cache::rememberForever(
                'settings',
                function () {
                    return Setting::pluck('value', 'key')->toArray();
                }
            );
        }

        function clearCachedSettings()
        {
            Cache::forget('settings');
        }
    }
