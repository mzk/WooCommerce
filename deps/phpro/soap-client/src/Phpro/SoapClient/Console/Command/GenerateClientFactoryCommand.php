<?php

namespace Packetery\Phpro\SoapClient\Console\Command;

use Packetery\Phpro\SoapClient\CodeGenerator\ClientFactoryGenerator;
use Packetery\Phpro\SoapClient\CodeGenerator\Context\ClassMapContext;
use Packetery\Phpro\SoapClient\CodeGenerator\Context\ClientContext;
use Packetery\Phpro\SoapClient\CodeGenerator\Context\ClientFactoryContext;
use Packetery\Phpro\SoapClient\CodeGenerator\Model\TypeMap;
use Packetery\Phpro\SoapClient\Console\Helper\ConfigHelper;
use Packetery\Phpro\SoapClient\Util\Filesystem;
use Packetery\Symfony\Component\Console\Command\Command;
use Packetery\Symfony\Component\Console\Input\InputInterface;
use Packetery\Symfony\Component\Console\Input\InputOption;
use Packetery\Symfony\Component\Console\Output\OutputInterface;
use Packetery\Symfony\Component\Console\Style\SymfonyStyle;
use Packetery\Laminas\Code\Generator\FileGenerator;
/** @internal */
class GenerateClientFactoryCommand extends Command
{
    const COMMAND_NAME = 'generate:clientfactory';
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * GenerateClientBuilderCommand constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        parent::__construct();
    }
    /**
     * Configure the command.
     */
    protected function configure()
    {
        $this->setName(self::COMMAND_NAME)->setDescription('Generates a client factory')->addOption('config', null, InputOption::VALUE_REQUIRED, 'The location of the soap code-generator config file')->addOption('overwrite', 'o', InputOption::VALUE_NONE, 'Makes it possible to overwrite by default');
    }
    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $config = $this->getConfigHelper()->load($input);
        $classmapContext = new ClassMapContext(new FileGenerator(), new TypeMap('', []), $config->getClassMapName(), $config->getClassMapNamespace());
        $clientContext = new ClientContext($config->getClientName(), $config->getClientNamespace());
        $context = new ClientFactoryContext($clientContext, $classmapContext);
        $generator = new ClientFactoryGenerator();
        $dest = $config->getClientDestination() . \DIRECTORY_SEPARATOR . $config->getClientName() . 'Factory.php';
        $this->filesystem->putFileContents($dest, $generator->generate(new FileGenerator(), $context));
        $io->success('Generated client factory at ' . $dest);
        return 0;
    }
    /**
     * Function for added type hint
     * @return ConfigHelper
     */
    public function getConfigHelper() : ConfigHelper
    {
        return $this->getHelper('config');
    }
}