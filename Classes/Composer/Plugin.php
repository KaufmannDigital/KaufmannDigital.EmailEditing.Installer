<?php
declare(strict_types=1);

namespace KaufmannDigital\EmailEditing\Installer\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io): void {}

    public function deactivate(Composer $composer, IOInterface $io): void {}

    public function uninstall(Composer $composer, IOInterface $io): void {}

    public static function getSubscribedEvents(): array
    {
        return [
            'post-install-cmd' => 'installMjmlDependencies',
            'post-update-cmd'  => 'installMjmlDependencies',
        ];
    }

    public function installMjmlDependencies(Event $event): void
    {
        $package = $event->getComposer()->getRepositoryManager()
            ->findPackage('spatie/mjml-php', '*');

        if ($package === null) {
            return;
        }

        $packagePath = $event->getComposer()->getInstallationManager()
            ->getInstallPath($package);

        $result = shell_exec(sprintf('cd %s && npm install 2>&1', escapeshellarg($packagePath)));

        if (is_string($result)) {
            $event->getIO()->write('🥳 Successfully installed MJML Node-Modules for package spatie/mjml-php');
        } else {
            $event->getIO()->writeError('Failed to install MJML Node-Modules for package spatie/mjml-php');
        }
    }
}
